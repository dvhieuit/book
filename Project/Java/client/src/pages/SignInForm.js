import React, { Component } from 'react';
import { BrowserRouter as Router, Route, NavLink, Link } from 'react-router-dom';
import axios from 'axios';
import BackHome from './BackHome';
class SignInForm extends Component {

	constructor() {
		super();


		this.state = {
			email: '',
			password: '',
			formErrors: {email: '', password: ''},
		    emailValid: false,
		    passwordValid: false,
		    formValid: false
		};

		this.handleChange = this.handleChange.bind(this);
		this.handleSubmit = this.handleSubmit.bind(this);

	}		

	handleChange(e) {
		let target = e.target;
		let value = target.type === 'checkbox' ? target.checked : target.value;
		let name = target.name;

		this.setState ({
			[name]: value},
			() => { this.validateField(name, value)
		});
	}

	handleSubmit(e) {
		e.preventDefault();
		console.log('The form was submitted with the data:');
		console.log(this.state);
	}

	validateField(fieldName, value) {
	  let fieldValidationErrors = this.state.formErrors;
	  let emailValid = this.state.emailValid;
	  let passwordValid = this.state.passwordValid;

	  switch(fieldName) {
	    case 'email':
	      emailValid = value.match(/^([\w.%+-]+)@([\w-]+\.)+([\w]{2,})$/i);
	      fieldValidationErrors.email = emailValid ? '' : ' is invalid';
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
	  this.setState({formValid: this.state.emailValid && this.state.passwordValid});
	}
	
			render() {
			return (
				<div className="FormCenter">
		 			<form className="FormField" onSubmit={this.handleSubmit}>
		 				<div class="FormField">
		 					<label className="FormField__Label" htmlFor="email">Email Address</label>
		 					<input type="email" id="email" className="FormField__Input" placeholder="Enter your email" name="email" value={this.state.email} onChange={this.handleChange}/>
		 				</div>
		 			</form>

		 			<form className="FormField" onSubmit={this.handleSubmit}>
		 				<div class="FormField">
		 					<label className="FormField__Label" htmlFor="password">Password</label>
		 					<input type="password" id="password" className="FormField__Input" placeholder="Enter your password" name="password" value={this.state.password} onChange={this.handleChange}/>
		 				</div>
		 			</form>
		 			
		 			<div class="FormField">
		 				<Link to="/back"><button type ="submit" className="FormField__Button mr-20" disabled={!this.state.formValid}>Sign In</button> </Link><Link to="/sign-up" className="FormField__Link">Create an account</Link>		
		  			</div>	

	  			</div>

				);
		}

	}

export default SignInForm;