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
    @ObservedObject var loginPageController = LoginPageController()
    
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
            
            Button(action:{self.Login()}){
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
    func Login() {
        loginPageController.signIn(email:  self.email, password: self.password)
        { (result, error) in
            if error != nil
            {
                print("Error when signing in: \(error)")
            }
            else
            {
                print("login successful")
                
            }
            
        }
    }
}

struct SuccessfulLogin : View {
    var body: some View {
        Text("Login Successful")
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


//struct Login2_Previews: PreviewProvider {
//    static var previews: some View {
//        LoginView()
//    }
//}
