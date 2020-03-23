//
//  ClassesListView.swift
//  sandy
//
//  Created by Madison Gipson on 2/19/20.
//  Copyright © 2020 csci321. All rights reserved.
//

import SwiftUI

struct ClassRowView: View {
    var classes:String
    var body: some View {
        HStack {
            Image(systemName: "desktopcomputer").resizable().frame(width: 40, height: 40).foregroundColor(Color.yellow).padding(.horizontal)
            Text(classes).font(.system(size: 20, weight: .light, design: .default)).foregroundColor(Color.yellow)
        }
    }
}

struct ClassesListView: View {
    @ObservedObject var classesListController:ClassesListController
    let screenSize = UIScreen.main.bounds
    var body: some View {
        VStack {
            HStack {
                Text("My Classes").font(.system(size: 36, weight: .thin, design: .default)).foregroundColor(Color.yellow).padding(.horizontal, 40)//.background(Color.yellow)
                Button(action: {
                    // add class
                }) {
                    Image(systemName: "plus.circle")
                    .resizable()
                    .foregroundColor(Color.yellow) // change color if it's clicked
                    .frame(width: screenSize.width/15, height: screenSize.width/15)
                    .padding(.horizontal)
                }
            }.frame(width: screenSize.width, height: screenSize.width/6, alignment: .center)
            List {
                ForEach(ClassesListController.studentList, id: \.self) { student in
                ClassRowView(classes: student)
                }
            }
        }
    }
}

/*struct ClassesListView_Previews: PreviewProvider {
    static var previews: some View {
        ClassesListView()
    }
}*/
