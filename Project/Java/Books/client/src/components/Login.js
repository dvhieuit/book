import React, {Component} from 'react';
import Axios from 'axios';
import { BrowserRouter as Router, Route, Link } from 'react-router-dom';
class Login extends Component {
    constructor(props){
        super(props);
        this.state = {
            id: '',
            name: '',
            email: '',
            password: '',
            users: [],
            count: 0,
            error: null,
            isLoggedIn: false,
            formErrors: {email: '', password: ''},
            emailValid: false,
            passwordValid: false,
            formValid: false
        };
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    componentDidMount(){
        Axios.get('http://5cf3c75ccaf9090014b4b39c.mockapi.io/users')
        .then(res => {
            const users = res.data;
            this.setState({users});
        })
    }

    checkSignIn = () => {
       // console.log(this.state.email+" "+this.state.password);
        this.state.users.map(user => {
            //console.log(user);
            if ((user.email == this.state.email) && (user.password == this.state.password)){
                //console.log("thanh cong");
                this.state.count=1;
                this.setState({
                    count: 1,
                    name: user.name,
                    email: user.email,
                    id: user.id,
                })
                 localStorage.setItem('email',this.state.email);
            }

        })
    console.log(this.state.count);
    if(this.state.count==1) {
        alert("Dang nhap thanh cong");
       window.location.replace("/");
     }
    else{
      alert("that bai");
      window.location.replace("/login");

      } 
    }

    handleChange = event => {
        let target = event.target;
        let value = target.type === 'checkbox' ? target.checked : target.value;
        let name = target.name;

        this.setState ({
          [name]: value},
          () => { this.validateField(name, value)
        });
       // console.log(this.state.password);
        this.setState({ [event.target.name]: event.target.value});   
    }

    handleSubmit = event => {
        event.preventDefault();
        //console.log('The form was submitted with the data:');
        //console.log(this.state);
        if (this.state.count !== 0){            
            let user = {
                id: localStorage.getItem(this.state.name),
                name: this.state.name,
                email: this.state.email,
                password: this.state.password,
            }
            console.log(user);
            localStorage.setItem('current_user', JSON.stringify(user))
            
            this.setState({
                count: 0,
                
            })
            this.setState(prevState => ({
                isLoggedIn: !prevState.isLoggedIn
            }))
            window.location.replace("/");
        }
        else
        {
            this.state.error='Invalid email or password';

        }
    }

    validateField(fieldName, value) {
    let fieldValidationErrors = this.state.formErrors;
    let emailValid = this.state.emailValid;
    let passwordValid = this.state.passwordValid;

    switch(fieldName) {
      case 'email':
        emailValid = value.match(/^([\w.%+-]+)@([\w-]+\.)+([\w]{2,})$/i);
        fieldValidationErrors.email = emailValid ? '' : console.log("is invalue email");
        break;
      case 'password':
        passwordValid = value.length >= 6;
        fieldValidationErrors.password = passwordValid ? '': ' Is too short';
        break;
      default:
        break;
    }
    this.setState({formErrors: fieldValidationErrors,
                    emailValid: emailValid,
                    passwordValid: passwordValid
                  }, this.validateForm);
  }

  validateForm() {
    //console.log(this.state.emailValid+"form valid"+this.state.passwordValid);
    this.setState({formValid: this.state.emailValid && this.state.passwordValid});
  }

  render() {
    var username=localStorage.getItem('email');
    //console.log(username);
    if(username!=null)  window.location.replace("/");
    return (
    <div className="login-wrap">
        <div className="login-html">
          <input id="tab-1" type="radio" name="tab" className="sign-in" defaultChecked /><label htmlFor="tab-1" className="tab">Sign In</label>
          <input id="tab-2" type="radio" name="tab" className="sign-up" /><label htmlFor="tab-2" className="tab">Sign Up</label>
           
          <div className="login-form" onSubmit={this.handleSubmit}>
            <div className="sign-in-htm">
              <div className="group">

                <label className="text">Email</label>
                <input id="user" name="email"  type="email" className="input" placeholder="Enter your email" value={this.state.email} onChange={this.handleChange} />
              </div>
              <div className="group">
                <label className="text">Password</label>
                <input id="pass" name="password"  type="password" className="input" data-type="password" value={this.state.password} onChange={this.handleChange} />
              </div>
              <div className="group"> 
                <input type="submit" className="button" onClick={this.checkSignIn} disabled={!this.state.formValid} value="Sign in"/>
              </div>
              <div className="hr" />
              <div className="foot-lnk">
                <Link to="/SignUp">Create an account?</Link>
              </div>
            </div>
            <div className="sign-up-htm">
              <div className="group">
                <label className="text">Full name</label>
                <input id="user" type="text" className="input"/>
              </div>
              <div className="group">
                <label className="text">Email Address</label>
                <input id="pass" type="text" className="input" />
              </div>
              <div className="group">
                <label className="text">Password</label>
                <input id="pass" type="password" className="input" data-type="password" />
              </div>
              <div className="group">
                <label className="text">Confirm Password</label>
                <input id="pass" type="password" className="input" data-type="password" />
              </div>
              <div className="group">
                <input type="submit" className="button" onClick={this.checkSignIn} value="Sign Up"/>
              </div>
              <div className="hr" />
              <div className="foot-lnk">
                <label htmlFor="tab-1">Already Member?
                </label></div>
            </div>
          </div>
        </div>
      </div>
    );
  }
}
export default Login;

