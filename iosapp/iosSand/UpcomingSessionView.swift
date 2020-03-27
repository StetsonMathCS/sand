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
                Text(request.classRequest).font(.system(size: 36, weight: .light, design: .default)).foregroundColor(Color.yellow).padding(.horizontal)
            } else {
                Text(request.classRequest).font(.system(size: 36, weight: .light, design: .default)).foregroundColor(Color.gray).padding(.horizontal)
            }
            VStack {
                if request.matched {
                    Text(" at " + request.time).font(.system(size: 18, weight: .thin, design: .default)).foregroundColor(Color.yellow)
                    Text(" in " + request.location).font(.system(size: 18, weight: .thin, design: .default)).foregroundColor(Color.yellow)
                } else {
                    Text(" at " + request.time).font(.system(size: 18, weight: .thin, design: .default)).foregroundColor(Color.gray)
                    Text(" in " + request.location).font(.system(size: 18, weight: .thin, design: .default)).foregroundColor(Color.gray)
                }
            }
        }}.sheet(isPresented: self.$showDetailForm) {
            SessionDetailView(request: self.request)
        }
    }
}

struct UpcomingSessionsView: View {
    @ObservedObject var reqController:RequestController
    let screenSize = UIScreen.main.bounds
    //@ObservedObject var request:Request
    var body: some View {
        VStack {
            Text("Upcoming Sessions").frame(width: screenSize.width, height: screenSize.width/6, alignment: .center).font(.system(size: 36, weight: .thin, design: .default)).foregroundColor(Color.yellow)//.background(Color.yellow)
            //Divider().padding(.bottom, 8).foregroundColor(Color.white).background(Color.yellow)
            List {
                ForEach(reqController.reqList) { req in
                    SessionRow(request: req)
                }
            }
        }
    }
}
