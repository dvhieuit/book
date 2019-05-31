import React, { Component } from "react";

const REGEX_EMAIL = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const url = 'http://localhost:8080/api/customer/signup';

class SignUpComponent extends Component {
constructor(props) {
        super(props);
        
        this.state ={
            id: '',
            email : 'abcxyz16@gmail.com',
            password : 'Abc1234@',
			fullName : 'ABC15',
            phoneNumber : '1313031165',
            role:'ROLE_CUSTOMER',
            imageURL: 'https://i.imgur.com/2G9UXB2.png'
        }
    }
	
  componentDidMount()
  {
    const data1 = {
            email : this.state.email,
            password : this.state.password,
            fullName : this.state.fullName,
            phoneNumber : this.state.phoneNumber
        }

    fetch(url, {
            method : 'POST',
            headers : {
                "Content-Type": "application/json"
            },
            body : JSON.stringify(data1)
        })
        .then(res => res.json())
        .then(data =>{
            if(data.status === 'SUCCESS'){
                console.log("SUCCESS");
                this.setState({
                    id: data.data.id,
                    fullName : data.data.fullName,
                    phoneNumber : data.data.phoneNumber,
                    role: "ROLE_CUSTOMER",
                    imageURL: data.data.imageURL
                });
            }
            else if (data.status === 'FAILED') {
                console.log("FAILED");
            }
        })

  }
	
  render() {
      return (
          <div className="App">
              <header className="App-header">
                  <form className="form-signin">
                      <h2 className="form-signin-heading"> Please sign in </h2>
                      <label htmlFor="inputEmail" className="sr-only"> Email address
                      </label>
                      <input type="email" id="inputEmail" className="form-control" placeholder="Email address" required
                             autoFocus/>
                      <label htmlFor="inputPassword" className="sr-only"> Password</label>
                      <input type="password" id="inputPassword" className="form-control" placeholder="Password"
                             required/>
                      <button className="btn btn-lg btn-primary btn-block" type="button"> Sign in
                      </button>
                  </form>
              </header>
          </div>
      );
  }
}

export default SignUpComponent;
