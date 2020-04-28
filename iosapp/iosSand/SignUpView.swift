//
//  SignUpView.swift
//  iosSand
//
//  Created by Marshall Thompson on 4/19/20.
//  Copyright © 2020 Madison Gipson. All rights reserved.
//

import SwiftUI
import Firebase

struct SignUpView: View {
    // MARK: - Propertiers
    @State private var email = ""
    @State private var password = ""
    @State private var firstname = ""
    @State private var lastname = ""
    
    // MARK: - View
    var body: some View {
        VStack() {
            Text("Sign Up")
                .font(.largeTitle).foregroundColor(Color.black)
                .padding([.top, .bottom], 40)
                .shadow(radius: 10.0, x: 20, y: 10)
            
            VStack(alignment: .leading, spacing: 15) {
                UsernameTextField(email: $email)
                PasswordTextField(password: $password)
            }.padding([.leading, .trailing], 27.5)
            
            Button(action:
                {
            }){
                ButtonContent()
            }.padding(.top, 50)
            
            Spacer()
       
        }
    
        .background(
            LinearGradient(gradient: Gradient(colors: [.white, .orange]), startPoint: .top, endPoint: .bottom)
                .edgesIgnoringSafeArea(.all))
        
    }
}







struct Login1_Previews: PreviewProvider {
    static var previews: some View {
        LoginView()
    }
}

