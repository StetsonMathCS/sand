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
                LoginButtonContent()
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

struct SignUpView : View {
    // MARK: - Propertiers
    @State var email = ""
    @State var password = ""
    @State var confPassword = ""
    @State var firstName = ""
    @State var lastName = ""
    @ObservedObject var loginPageController = LoginPageController()
    private var validated: Bool {
        if(password == confPassword) {
            return true
        }
        else {
            return false
        }
    }
    var body: some View {
        VStack() {
            Text("Sign Up")
            .font(.largeTitle).foregroundColor(Color.black)
            .padding([.top, .bottom], 40)
            .shadow(radius: 10.0, x: 20, y: 10)
            
            
            VStack(alignment: .leading, spacing: 15) {
                FirstNameTextField(firstName: $firstName)
                LastNameTextField(lastName: $lastName)
                UsernameTextField(email: $email)
                PasswordTextField(password: $password)
                ConfPasswordTextField(confPassword: $confPassword)
                if validated {
                    Button(action:{self.signUp()}){
                        SignUpButtonContent()
                    }
                }
                
            }.padding([.leading, .trailing], 27.5)
        }
        .background(
        LinearGradient(gradient: Gradient(colors: [.white, .orange]), startPoint: .top, endPoint: .bottom)
            .edgesIgnoringSafeArea(.all))
    }
    func signUp() {
        loginPageController.signUp(email: self.email, password: self.password)
        {(result, error) in
            if error != nil
            {
                print("Error when signing up: \(error)")
            }
            else
            {
                print("sign up successful")
            }
        }
    }
    
}



struct FirstNameTextField : View {
    @Binding var firstName: String
    var body: some View {
        TextField("First Name", text: $firstName)
            .padding()
            .background(Color.white)
            .cornerRadius(20.0)
            .shadow(radius: 10.0, x: 20, y: 10)
    }
}

struct LastNameTextField : View {
    @Binding var lastName: String
    var body: some View {
        TextField("First Name", text: $lastName)
            .padding()
            .background(Color.white)
            .cornerRadius(20.0)
            .shadow(radius: 10.0, x: 20, y: 10)
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
            .autocapitalization(.none)
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
            .autocapitalization(.none)
    }
}

struct ConfPasswordTextField : View {
    @Binding var confPassword: String
    var body: some View {
        SecureField("Password", text: $confPassword)
            .padding()
            .background(Color.white)
            .cornerRadius(20.0)
            .shadow(radius: 10.0, x: 20, y: 10)
            .autocapitalization(.none)
    }
}

struct LoginButtonContent : View {
    var body: some View {
        Text("Login")
            .font(.headline)
            .foregroundColor(.white)
            .padding()
            .frame(width: 300, height: 50)
            .background(Color.green)
            .cornerRadius(15.0)
            .shadow(radius: 10.0, x: 20, y: 10)
    }
}

struct SignUpButtonContent : View {
    var body: some View {
        Text("Sign Up")
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
