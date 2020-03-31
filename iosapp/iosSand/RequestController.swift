//
//  Request.swift
//  sandy
//
//  Created by Madison Gipson on 2/19/20.
//  Copyright © 2020 csci321. All rights reserved.
//

import Foundation

class RequestController: ObservableObject {
    @Published var reqList:[Request] = []
    @Published var classList:[Request] = []
    @Published var timeList:[Request] = []
    @Published var locationList:[Request] = []
    
    func retrieveAllData() {
        for r in reqList {
            retrieveFirebaseData(requestName: r.id, request: r)
        }
    }
    func retrieveFirebaseData(requestName: String, request: Request) {
        AppDelegate.shared().requestList.child(requestName).child("matched").observe(.value, with: { snapshot in
            request.matched = snapshot.value as! Bool
            })
        AppDelegate.shared().requestList.child(requestName).child("class").observe(.value, with: { snapshot in
            request.classRequest = snapshot.value as! String
        })
        AppDelegate.shared().requestList.child(requestName).child("time").observe(.value, with: { snapshot in
            request.time = snapshot.value as! String
        })
        AppDelegate.shared().requestList.child(requestName).child("tutorLocation").observe(.value, with: { snapshot in
            request.location = snapshot.value as! String
        })
    }
}

class Request: Identifiable, ObservableObject {
    @Published var id: String
    @Published var matched: Bool
    @Published var classRequest: String
    @Published var time: String
    @Published var location: String
    
    init(request: String, matched: Bool, classRequest: String, time: String, location: String) {
        self.id = request
        self.matched = matched
        self.classRequest = classRequest
        self.time = time
        self.location = location
    }
}
