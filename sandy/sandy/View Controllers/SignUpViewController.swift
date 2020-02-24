//
//  SignUpViewController.swift
//  sandy
//
//  Created by Marshall Thompson on 2/22/20.
//  Copyright © 2020 csci321. All rights reserved.
//

import UIKit
import Firebase
import FirebaseAuth

class SignUpViewController: UIViewController
{
    
    @IBOutlet var firstNameTextField: UITextField!
    @IBOutlet var lastNameTextField: UITextField!
    @IBOutlet var emailTextField: UITextField!
    @IBOutlet var passwordTextField: UITextField!
    @IBOutlet var signUpButton: UIButton!
    @IBOutlet var errorLabel: UILabel!
    
    override func viewDidLoad()
    {
        super.viewDidLoad()
        setUpElements()
    }
    
    func setUpElements()
    {
        //hide the error label
        errorLabel.alpha = 0
    }
    
    func validateFields() -> String?
    {
        if firstNameTextField.text?.trimmingCharacters(in: .whitespacesAndNewlines) == "" ||
            lastNameTextField.text?.trimmingCharacters(in: .whitespacesAndNewlines) == "" ||
            emailTextField.text?.trimmingCharacters(in: .whitespacesAndNewlines) == "" ||
            passwordTextField.text?.trimmingCharacters(in: .whitespacesAndNewlines) == ""
        {
            return "Pleaase fill in all fields."
        }
        return nil
    }
    
    @IBAction func signUpTapped(_ sender: Any)
    {
        //validate the fields
        let error = validateFields()
        
        if error != nil
        {
            //there's something wrong with the fields show error
            showError(error!)
        }
        else
        {
            //create cleaned version the data
            let firstName = firstNameTextField.text!.trimmingCharacters(in: .whitespacesAndNewlines)
            let lastName = lastNameTextField.text!.trimmingCharacters(in: .whitespacesAndNewlines)
            let email = emailTextField.text!.trimmingCharacters(in: .whitespacesAndNewlines)
            let password = passwordTextField.text!.trimmingCharacters(in: .whitespacesAndNewlines)
            
            //create the user
            Auth.auth().createUser(withEmail: email, password: password)
            {
                (result, err) in
                if err != nil
                {
                    self.showError("Error creating user")
                }
                else
                {
                    self.transitionToHome()
                    
                }
            }
        }
    }

    func transitionToHome()
    {
        let homeViewController = storyboard?.instantiateViewController(identifier: Constants.Storyboard.welcomeViewController) as? HomeViewController
        
        view.window?.rootViewController = homeViewController
        view.window?.makeKeyAndVisible()
    }
    
    func showError(_ message:String)
    {
        errorLabel.text = message
        errorLabel.alpha = 1
    }
}
