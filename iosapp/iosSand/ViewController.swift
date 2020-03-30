//
//  ViewController.swift
//  sandy
//
//  Created by Robert Manalo on 2/5/20.
//  Copyright © 2020 csci321. All rights reserved.
//

//import UIKit
import SwiftUI

struct ViewController: View /*UIViewController, UITextFieldDelegate*/ {
    @ObservedObject var reqController:RequestController
    @State private var showDetailForm = false
    let classesListController:ClassesListController //= ClassesListController()
    @State var page:String = "Upcoming Sessions"
    let screenSize = UIScreen.main.bounds
    @Environment(\.colorScheme) var colorScheme

    var body: some View {
        VStack {
            if page == "Upcoming Sessions" {
                UpcomingSessionsView(reqController: self.reqController, classesListController: self.classesListController)
            }
            if page == "Classes" {
                ClassesListView(classesListController: self.classesListController)
            }
            if page == "Settings" {
                UpcomingSessionsView(reqController: self.reqController, classesListController: self.classesListController)
            }
            HStack {
                Button(action: {
                    self.page = "Upcoming Sessions"
                }) {
                    Image(systemName: "list.bullet")
                    .resizable()
                    .foregroundColor(Color.yellow) // change color if it's clicked
                    .frame(width: screenSize.width/15, height: screenSize.width/15)
                    .padding(.horizontal, 40)
                }
                Button(action: {
                    self.page = "Classes"
                }) {
                    Image(systemName: "book")
                    .resizable()
                    .foregroundColor(Color.yellow) // change color if it's clicked
                    .frame(width: screenSize.width/15, height: screenSize.width/15)
                    .padding(.horizontal, 40)
                }
                Button(action: {
                    self.page = "Settings"
                }) {
                    Image(systemName: "gear")
                    .resizable()
                    .foregroundColor(Color.yellow) // change color if it's clicked
                    .frame(width: screenSize.width/15, height: screenSize.width/15)
                    .padding(.horizontal, 40)
                }
            }.padding(.top, 10)
        }
    }
}

