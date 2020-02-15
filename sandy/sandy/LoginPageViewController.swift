//
//  LoginPageViewController.swift
//  sandy
//
//  Created by Marshall Thompson on 2/15/20.
//  Copyright © 2020 csci321. All rights reserved.
//

import UIKit

class LoginPageViewController: UIViewController
{


    @IBOutlet var Username: UITextField!
    @IBOutlet var Password: UITextField!
    
    
    @IBAction func SignIn(_ sender: Any)
    {
        if(Username.text == "Goodbye" && Password.text == "Hello")
        {
            print("Credentials Accepted")
            print(Username.text)
        }
        else
        {
            print("Access Denied")
        }
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
