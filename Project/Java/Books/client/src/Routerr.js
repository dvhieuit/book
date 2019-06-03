import React, { Component } from 'react';
import App from './App';
import Header from './components/Header';
import Products from './components/Products';
import Login from './components/Login';
import Logout from './components/Logout';
import SignUp from './components/SignUp';

import { BrowserRouter as Router, Route, Link } from "react-router-dom";

class Routerr extends Component {
	render() {
		return (
			<Router>
			      <Header/>
			<div>
				<div className="main-route-place">
					<Route exact path = "/" component = {App}/>
					<Route path = "/Login" component = {Login}/>
					<Route path = "/SignUp" component = {SignUp}/>
					<Route path = "/Logout" component = {Logout}/>

				</div>
			</div>
			</Router>
		);
	}
}
	export default Routerr;
