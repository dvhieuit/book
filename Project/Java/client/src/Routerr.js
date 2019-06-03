import React, { Component } from 'react';
import App from './App';
import Home from './Home';
import BackHome from './pages/BackHome';
import SignUpForm from './pages/SignUpForm';
import SignInForm from './pages/SignInForm';
import { BrowserRouter, Route, Link } from "react-router-dom";
import { makeStyles } from "@material-ui/core/styles";
import AppBar from "@material-ui/core/AppBar";
import Toolbar from "@material-ui/core/Toolbar";
import Button from "@material-ui/core/Button";

const url = 'http://localhost:8080/api/customer/signup';
const useStyles = makeStyles(theme => ({
  root: {
    flexGrow: 1
  },
  title: {
    flexGrow: 1
  }
}));

class Routerr extends Component {
	constructor(props) {
        super(props);
        
        this.state ={
            id: '',
            email : 'abcxyz11@gmail.com',
            password : 'Abc1234@',
			      fullName : 'ABC11',
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
        <BrowserRouter>
        <div>
          <div className="main-route-place">
            <Route exact path="/"  component={Home}/>
            <Route path="/sign-in" component={App} />
            <Route path="/back" component={BackHome} />

          </div>
        </div>
      </BrowserRouter>
 
      );
  }
}
export default Routerr