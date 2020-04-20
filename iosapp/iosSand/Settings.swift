//
//  Settings.swift
//  iosSand
//
//  Created by Robert Manalo on 3/25/20.
//  Copyright © 2020 Madison Gipson. All rights reserved.
//

import SwiftUI

struct Settings: View {
    var body: some View {
        NavigationView {
            ZStack {
                HStack {
                    VStack(alignment: .leading, spacing: 45, content: {
                    NavigationLink(destination: ProfileView()) {
                        Image(systemName: Constants.settingsNavigation.profileButton).font(.largeTitle)
                        Text("Profile")
                    }
                    NavigationLink(destination: PaymentView()) {
                        Image(systemName: Constants.settingsNavigation.paymentButton).font(.largeTitle)
                        Text("Payment")
                    }
                    NavigationLink(destination: AboutView()) {
                        Image(systemName: Constants.settingsNavigation.aboutButton).font(.largeTitle)
                        Text("About")
                    }
                }).foregroundColor(Color.black.opacity(0.5))
                    .navigationBarTitle("Settings")
                    Spacer()
                }.padding() 
            }.frame(height: 175)
        }
    }
}

struct Settings_Previews: PreviewProvider {
    static var previews: some View {
        Settings()
    }
}
