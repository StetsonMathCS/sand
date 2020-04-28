//
//  ProfileView.swift
//  iosSand
//
//  Created by Robert Manalo on 4/1/20.
//  Copyright © 2020 Madison Gipson. All rights reserved.
//

import SwiftUI

struct ProfileView: View {
    var body: some View {
        NavigationView {
            VStack() {
                NavigationLink(destination: LoginView())
                {
                   Text("Login")
                    .font(.largeTitle).foregroundColor(Color.blue)
                }
                Text("Sign Out")
        }

        }
    }
}

//struct ProfileView_Previews: PreviewProvider {
//    static var previews: some View {
//        ProfileView()
//    }
//}
