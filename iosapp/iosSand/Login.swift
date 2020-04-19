//
//  Login.swift
//  iosSand
//
//  Created by Marshall Thompson on 4/4/20.
//  Copyright © 2020 Madison Gipson. All rights reserved.
//

import SwiftUI




struct LoginView : View {
    // properites
    @State private var username = ""
    @State private var password = ""
    
    //View
    var body: some View {
        
        VStack() {
            Text("Login")
                .font(.largeTitle).foregroundColor(Color.white)
                .padding([.top,.bottom], 40)
                .shadow(radius: 10.0, x: 20, y: 10)
            TextField("Username", text: $username)
                .padding()
                .textFieldStyle(RoundedBorderTextFieldStyle())
                
                .multilineTextAlignment(.center)
                .cornerRadius(20.0)
            TextField("Password", text: $password)
                .padding()
            
            Button("Sign In") {}
        }
        .background(Color.gray)
    }
}

struct LoginText : View {
    var body: some View {
        return Text("Login")
            .font(.largeTitle)
            .fontWeight(.semibold)
    }
}

#if DEBUG
struct Login_Previews: PreviewProvider {
    static var previews: some View {
        LoginView()
    }
}
#endif

