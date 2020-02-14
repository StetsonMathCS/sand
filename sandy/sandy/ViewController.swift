//
//  ViewController.swift
//  sandy
//
//  Created by Robert Manalo on 2/5/20.
//  Copyright © 2020 csci321. All rights reserved.
//

import UIKit

class ViewController: UIViewController, UITextFieldDelegate {
    
    //MARK: Properties
    @IBOutlet weak var nameTextfield: UITextField!
    @IBOutlet weak var classNameLabel: UILabel!
    
    override func viewDidLoad() {
        super.viewDidLoad()
        // Handle the text field's user input through delegate callbacks
        nameTextfield.delegate = self
        // Do any additional setup after loading the view.
    }
    //MARK: UITextFieldDelegate
    func textFieldShouldReturn(_ textField: UITextField) -> Bool {
    // Hide the keyboard.
        classNameLabel.text = textField.text
    textField.resignFirstResponder()
        return true
    }
    //MARK: Actions
    @IBAction func setDefaultText(_ sender: UIButton) {
        classNameLabel.text = "Default text"
    }
    
    
}

