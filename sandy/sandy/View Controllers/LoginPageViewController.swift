//
//  LoginPageViewController.swift
//  sandy
//
//  Created by Marshall Thompson on 2/15/20.
//  Copyright © 2020 csci321. All rights reserved.
//

import UIKit
import FirebaseAuth

class LoginPageViewController: UIViewController
{
    
    
  
    @IBOutlet var Username: UITextField!
    @IBOutlet var Password: UITextField!
    @IBOutlet var errorLabel: UILabel!
    
    override func viewDidLoad() {
        
        super.viewDidLoad()
        setUpElements()
        }
    
    func setUpElements()
    {
        //hide the error label
        errorLabel.alpha = 0
    }
    
    @IBAction func loginTapped(_ sender: Any)

    {
        let email = Username.text!.trimmingCharacters(in: .whitespacesAndNewlines)
        let password = Password.text!.trimmingCharacters(in: .whitespacesAndNewlines)
        // gets default auth UI object
        //        let authUI = FUIAuth.defaultAuthUI()
        Auth.auth().signIn(withEmail: email, password: password) { (result, error) in

            if error != nil {
                // Couldn't sign in
                self.errorLabel.text = error!.localizedDescription
                print(error!.localizedDescription)
                self.errorLabel.alpha = 1
            }
            else {
                
                self.performSegue(withIdentifier: "Login", sender: self)  
//                let homeViewController = self.storyboard?.instantiateViewController(identifier: Constants.Storyboard.welcomeViewController) as? HomeViewController
//
//                self.view.window?.rootViewController = homeViewController
//                self.view.window?.makeKeyAndVisible()
                
            }
        }
    }
    
    

    
    
    /*
     // MARK: - Navigation
     
     // In a storyboard-based application, you will often want to do a little preparation before navigation
     override func prepare(for segue: UIStoryboardSegue, sender: Any?) {
     // Get the new view controller using segue.destination.
     // Pass the selected object to the new view controller.
     }
     */
    
}


//extension LoginPageViewController: FUIAuthDelegate
//{
////    func authUI(_ authUI: FUIAuth, didSignInWith authDataResult: AuthDataResult?, error: Error?)
//    func authUI(_ authUI: FUIAuth, didSignInWith user: User?, error: Error?)
//    {
//        //check to see if their is an error
//        if error != nil
//        {
//            //log error
//            return
//        }
//
//        performSegue(withIdentifier: "goHome", sender: self)
//    }
//}
