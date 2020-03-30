//
//  UpcomingSessionsView.swift
//  sandy
//
//  Created by Madison Gipson on 2/19/20.
//  Copyright © 2020 csci321. All rights reserved.
//

import SwiftUI

struct SessionRow: View {
    @ObservedObject var request:Request
    @State private var showDetailForm = false
    var body: some View {
        Button(action: {
            print("action")
            self.showDetailForm.toggle()
        }) { HStack {
            // Only difference is color of text
            if request.matched {
                Text(request.clas).font(.system(size: 36, weight: .light, design: .default)).foregroundColor(Color.yellow).padding(.horizontal)
            } else {
                Text(request.clas).font(.system(size: 36, weight: .light, design: .default)).foregroundColor(Color.gray).padding(.horizontal)
            }
            VStack {
                if request.matched {
                    Text(" at " + request.time == "" ? "Not matched" : request.time).font(.system(size: 18, weight: .thin, design: .default)).foregroundColor(Color.yellow)
                    Text(" in " + request.tutorLocation == "" ? "Not matched" : request.tutorLocation).font(.system(size: 18, weight: .thin, design: .default)).foregroundColor(Color.yellow)
                } else {
                    Text("Not matched").font(.system(size: 18, weight: .thin, design: .default)).foregroundColor(Color.gray)
                    Text("Not matched").font(.system(size: 18, weight: .thin, design: .default)).foregroundColor(Color.gray)
                }
            }
        }}.sheet(isPresented: self.$showDetailForm) {
            SessionDetailView(request: self.request)
        }
    }
}

struct UpcomingSessionsView: View {
    @State private var showDetailForm = false
    @ObservedObject var reqController:RequestController
    @ObservedObject var classesListController:ClassesListController
    @State var timeList:[String] = []
    @State var displayTimeList:[Bool] = []
    let screenSize = UIScreen.main.bounds
    //@ObservedObject var request:Request
    
    func generateTimeList() {
        timeList.append("12:00 AM")
        timeList.append("12:30 AM")
        for i in 1...11 {
            timeList.append(String(i) + ":00 AM")
            timeList.append(String(i) + ":30 AM")
        }
        timeList.append("12:00 PM")
        timeList.append("12:30 PM")
        for i in 1...11 {
            timeList.append(String(i) + ":00 PM")
            timeList.append(String(i) + ":30 PM")
        }
        for _ in 0...47 {
            displayTimeList.append(false)
        }
    }
    
    var body: some View {
        VStack {
            HStack {
                Text("Upcoming Sessions")/*.frame(width: screenSize.width, height: screenSize.width/6, alignment: .center)*/.font(.system(size: 36, weight: .thin, design: .default)).foregroundColor(Color.yellow)
                //=====
                Button(action: {
                    self.showDetailForm.toggle()
                    self.generateTimeList()
                }) {
                    Image(systemName: "plus.circle")
                    .resizable()
                    .foregroundColor(Color.yellow) // change color if it's clicked
                    .frame(width: screenSize.width/15, height: screenSize.width/15)
                    .padding(.horizontal)
                }.sheet(isPresented: self.$showDetailForm) {
                    MakeRequestView(classesListController: self.classesListController, timeList: self.timeList, displayTimeList: self.displayTimeList)
                }
                //=====
            }
                //.background(Color.yellow)
            //Divider().padding(.bottom, 8).foregroundColor(Color.white).background(Color.yellow)
            List {
                ForEach(reqController.reqList) { req in
                    SessionRow(request: req)
                }
            }
        }
    }
}
