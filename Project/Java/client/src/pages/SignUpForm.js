import React, { Component } from 'react';
import { Link } from 'react-router-dom';

const emailRegex = RegExp(
  /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
);
const formValid = formErrors => {
	let valid = true;
	Object.values(formErrors).forEach(val => {
		val.length > 0 && (valid = false)
	});
	return valid;
};

class SignUpForm extends Component {

	constructor(props){
		super(props);
		this.state = {
			name:'',
			email:'',
			phone:'',
			password:'',
			confirm:'',
			formErrors: {name: '', email: '', phone:''}


		};
		this.handleSubmit = this.handleSubmit.bind(this); 
		this.handlePasswordChange = this.handleSubmit.bind(this);
		this.handleConfirmPassword = this.handleSubmit.bind(this);

	}

	handlePasswordChange = event => {
	  this.setState({
	    password: event.target.value,
	  });
	};
	handleConfirmPassword = event => {
	  if (event.handleConfirmPassword !== event.handlePasswordChange) {
	    console.error('error');
	  }
	};

	handleSubmit = () => {
		const { password, confirmPassword } = this.state;
		if (password !== confirmPassword) {
	        console.error("Passwords don't match");
	        return false;
		    } else
		    	return true;
		        // make API call
		if (formValid(this.state)) {
			console.log(`- SUBMITING- 
							name: ${this.state.name}
							email: ${this.state.email}
							phone: ${this.state.phone}
							password: ${this.state.password}
		`);
		} else {
			console.error('Form invalid');
		}	

	};


	handleChange = e => {
		e.preventDefault();
		const {name, value } = e.target;
		let formErrors = this.state.formErrors;

		console.log("name: ", name);
		console.log("Value: ", value);

		switch (name) {
			case "name":
					formErrors.name = value.length <6
					? 'minimum 6 characters' 
					: "";
				break;
			case "email":
					formErrors.email = emailRegex.test(value)
					? ""
					: 'typing address format';
				break;
			case "phone":
					formErrors.phone = value.length <9 
					? 'minimum 9 characters' 
					: "";
				break;
			case "password":
					formErrors.password = value.length <3
					? 'minimum 3 characters' 
					: "";
				break;
			default:
			break;
		}
		this.setState({ formErrors, [name]: value }, () => console.log(this.state));

	};



		render() {		
		const { formErrors } = this.state;
		return (
			<div className="FormCenter">

				<form onSubmit= {this.handleSubmit} className="FormField">
	 				<div class="FormField">
	 					<label className="FormField__Label" htmlFor="name">Fullname</label>
	 					<input type="text" id="name" className="FormField__Input" placeholder="Enter your name" name="name" value={this.state.name} onChange={this.handleChange}/>
	 					{formErrors.name.length > 0 && (
                		<span className="errorMessage">{formErrors.name}</span>
              		)}
	 				</div>
	 			</form>

				<form onSubmit= {this.handleSubmit} className="FormField">
	 				<div class="FormField">
	 					<label className="FormField__Label" htmlFor="email">Email Address</label>
	 					<input type="email" id="email" className="FormField__Input" placeholder="Enter your email" name="email" value={this.state.email} onChange={this.handleChange}/>
	 					{formErrors.email.length > 0 && (
                		<span className="errorMessage">{formErrors.email}</span>
              		)}
	 				</div>
	 			</form>
	 			
	 			<form onSubmit= {this.handleSubmit} className="FormField">
	 				<div class="FormField">
	 					<label className="FormField__Label" htmlFor="phone">Your Phonenumber</label>
	 					<input type="tel" id="phone" className="FormField__Input" placeholder="Enter your Phonenumber" name="phone" value={this.state.phone} onChange={this.handleChange}/>
	 					{formErrors.phone.length > 0 && (
                		<span className="errorMessage">{formErrors.phone}</span>
              		)}
	 				</div>
	 			</form>

 				<form onSubmit= {this.handleSubmit} className="FormField">
 					<div className="FormField">
	 					<label className="FormField__Label" htmlFor="password">Password</label>
	 					<input pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}' onChange={this.handlePasswordChange} type="password" id="password" className="FormField__Input" placeholder="Enter your password" name="password" />
 					</div>
 				</form>

 				<form onSubmit= {this.handleSubmit} className="FormField">
 					<div class="FormField">
	 					<label className="FormField__Label" htmlFor="confirm">Confirm Password</label>
	 					<input pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}' type="password" id="confirm" className="FormField__Input" placeholder="Reenter your password" name="confirm" onChange={this.handleConfirmPassword}/>
 					</div> 				
 				</form>

	 			<div class="FormField">
	 				<button className="FormField__Button mr-20">Sign Up</button> <Link to="/sign-in" className="FormField__Link">I'm already member</Link>
	 			</div>		
	 		</div>
			);
	}

}

export default SignUpForm;