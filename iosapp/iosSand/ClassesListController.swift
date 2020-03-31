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
    @Published var classTypeList: [String] = []
    @Published var classDic:Dictionary<String, [String]> = [:]
    static func retrieveAllData(studentGUID: String) {
        retrieveFirebaseData(studentGUID: studentGUID)
    }
    
    static func retrieveFirebaseData(studentGUID: String) {
        AppDelegate.shared().studentList.child(studentGUID).child("classes").observe(.value, with: { snapshot in
            ClassesListController.studentList = []
            for s in snapshot.value as! [String] {
                print(s)
                ClassesListController.studentList.append(s)
            }
        })
    }
    
    func retrieveClassList() {
        AppDelegate.shared().classesOfferedList.observeSingleEvent(of: .value, with: { snapshot in
            let classes = snapshot.value as? Dictionary<String, [String]>
            self.classDic = classes!
            var classCategory:[String] = []
            for (k, _) in classes! {
                classCategory.append(k)
            }
            self.classTypeList = classCategory.sorted { $0.localizedCaseInsensitiveCompare($1) == ComparisonResult.orderedAscending }
            
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
