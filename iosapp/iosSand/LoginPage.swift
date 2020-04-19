//
//  Login2.swift
//  iosSand
//
//  Created by Marshall Thompson on 3/25/20.
//  Copyright © 2020 Madison Gipson. All rights reserved.
//

import SwiftUI
import Firebase

struct LoginView: View {
    // MARK: - Propertiers
    @State private var email = ""
    @State private var password = ""
    
    // MARK: - View
    var body: some View {
        VStack() {
            Text("Login")
                .font(.largeTitle).foregroundColor(Color.black)
                .padding([.top, .bottom], 40)
                .shadow(radius: 10.0, x: 20, y: 10)
            
            VStack(alignment: .leading, spacing: 15) {
                UsernameTextField(email: $email)
                PasswordTextField(password: $password)
            }.padding([.leading, .trailing], 27.5)
            
            Button(action:
                {
                    Login(email: self.email, password: self.password)
            }){
                ButtonContent()
            }.padding(.top, 50)
            
            Spacer()
            HStack(spacing: 0) {
                Text("Don't have an account? ")
                Button(action: {}) {
                    Text("Sign Up")
                        .foregroundColor(.black)
                }
            }
        }
    
        .background(
            LinearGradient(gradient: Gradient(colors: [.white, .orange]), startPoint: .top, endPoint: .bottom)
                .edgesIgnoringSafeArea(.all))
        
    }
}

struct UsernameTextField : View {
    @Binding var email: String
    var body: some View {
        TextField("Email", text: $email)
            .padding()
            .background(Color.white)
            .cornerRadius(20.0)
            .shadow(radius: 10.0, x: 20, y: 10)
    }
}

struct PasswordTextField : View {
    @Binding var password: String
    var body: some View {
        SecureField("Password", text: $password)
            .padding()
            .background(Color.white)
            .cornerRadius(20.0)
            .shadow(radius: 10.0, x: 20, y: 10)
    }
}

struct ButtonContent : View {
    var body: some View {
        Text("Sign In")
            .font(.headline)
            .foregroundColor(.white)
            .padding()
            .frame(width: 300, height: 50)
            .background(Color.green)
            .cornerRadius(15.0)
            .shadow(radius: 10.0, x: 20, y: 10)
    }
}

func Login(email: String, password: String) {
    Auth.auth().signIn(withEmail: email, password: password) {
        user, error in
        if let error = error
        {
            print(error.localizedDescription)
            return
        }
    }
}
struct Login2_Previews: PreviewProvider {
    static var previews: some View {
        LoginView()
    }
}
