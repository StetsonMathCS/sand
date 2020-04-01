//
//  PaymentView.swift
//  iosSand
//
//  Created by Robert Manalo on 3/28/20.
//  Copyright © 2020 Madison Gipson. All rights reserved.
//

import SwiftUI

struct PaymentView: View {
    
    
    var body: some View {
        ZStack {
            Color.white
            VStack {
                Text("Paypal").foregroundColor(.black)
                Text("Venmo").foregroundColor(.black)
            }.navigationBarTitle("Payments", displayMode:.inline)
                .navigationBarItems(trailing:
                    HStack(spacing:15) {
                        Button(action: {
                            print("Added payment")
                        }) {
                            Image(systemName: Constants.settingsNavigation.addPayment).font(.title)
                        }
                    }
                    
            )
        }.edgesIgnoringSafeArea(.all)
    }
}

struct PaymentView_Previews: PreviewProvider {
    static var previews: some View {
        PaymentView()
    }
}
