//
//  ClassesListController.swift
//  sandy
//
//  Created by Madison Gipson on 2/19/20.
//  Copyright © 2020 csci321. All rights reserved.
//

import Foundation

class ClassesListController: ObservableObject {
    /*@Published*/
    public static var studentList: [String] = []
    static func retrieveAllData(studentGUID: String) {
        retrieveFirebaseData(studentGUID: studentGUID)
    }
    
    static func retrieveFirebaseData(studentGUID: String) {
        AppDelegate.shared().studentList.child(studentGUID).child("classes").observe(.value, with: { snapshot in
            for s in snapshot.value as! [String] {
                print(s)
                ClassesListController.studentList.append(s)
            }
        })
    }
}

/*class Student: Identifiable, ObservableObject {
    @Published var studentGUID: String!
    @Published var classes: [String]!
    
    init(studentGUID: String) {
        self.studentGUID = studentGUID
    }
}*/
