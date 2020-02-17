//
//  LoginPageViewController.swift
//  sandy
//
//  Created by Marshall Thompson on 2/15/20.
//  Copyright © 2020 csci321. All rights reserved.
//

import UIKit
import FirebaseUI

class LoginPageViewController: UIViewController
{


    @IBOutlet var Username: UITextField!
    @IBOutlet var Password: UITextField!
    
    

    @IBAction func loginTapped(_ sender: Any)
    {
        // gets default auth UI object
        let authUI = FUIAuth.defaultAuthUI()
        
        guard authUI != nil
        else {
            //Log the error
            return
        }
        
        // set ourselves as the delegate
        authUI?.delegate = self
        
        //get a reference to the auth UI view Controller
        let authViewController = authUI!.authViewController()
        
        //show it
        present(authViewController, animated: true, completion: nil)
    }
    
    
    
    override func viewDidLoad() {
        super.viewDidLoad()

        // Do any additional setup after loading the view.
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


extension LoginPageViewController: FUIAuthDelegate
{
    func authUI(_ authUI: FUIAuth, didSignInWith authDataResult: AuthDataResult?, error: Error?)
    {
        //check to see if their is an error
        if error != nil
        {
            //log error
            return
        }
        
        performSegue(withIdentifier: "goHome", sender: self)
    }
}
