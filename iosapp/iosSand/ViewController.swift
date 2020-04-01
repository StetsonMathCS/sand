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
    
    @State var selected = 3
    
    var body: some View {
        TabView (selection: $selected) {
            UpcomingSessionsView(reqController: self.reqController, classesListController: self.classesListController).tabItem({
                Image(systemName: Constants.TabBarImageName.tabBar0)
                    .font(.title)
                Text("\(Constants.TabBarText.tabBar0)")
            }).tag(0)
            ClassesListView(classesListController: classesListController).tabItem({
                Image(systemName: Constants.TabBarImageName.tabBar1)
                    .font(.title)
                Text("\(Constants.TabBarText.tabBar1)")
            }).tag(1)
            Settings().tabItem({
                Image(systemName: Constants.TabBarImageName.tabBar2)
                    .font(.title)
                Text("\(Constants.TabBarText.tabBar2)")
            }).tag(2)
        }.accentColor(Color.yellow)
        
    }
}

