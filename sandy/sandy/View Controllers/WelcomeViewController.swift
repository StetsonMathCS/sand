//
//  WelcomeViewController.swift
//  sandy
//
//  Created by Marshall Thompson on 2/23/20.
//  Copyright © 2020 csci321. All rights reserved.
//

import UIKit
import FirebaseAuth
import FirebaseDatabase

class WelcomeViewController: UIViewController {

    @IBOutlet var infoLabel: UILabel!
    
    
    override func viewDidLoad() {

        super.viewDidLoad()
        
        let ref = Database.database().reference()
        let currentUser = Auth.auth().currentUser
        let uid = currentUser!.uid

        ref.child("Students/students").child(uid).observeSingleEvent(of: .value)
        {
            (snapshot) in
            let userData = snapshot.value as? [String:Any]
            let firstName = userData?["firstName"]
            let lastName = userData?["lastName"]
            self.infoLabel.text = "\(firstName ?? String.self) \(lastName ?? String.self)"
        }
        
        
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
