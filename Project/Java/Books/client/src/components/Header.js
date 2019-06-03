import React, {Component} from 'react';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
class Header extends Component {
  render() {
  	var username=localStorage.getItem('email');
    console.log(username);
    if(username==null)
    return (
       <div>
        <nav className="navbar navbar-inverse">
          <div className="container-fluid">
            <ul className="nav navbar-nav">
              <li className="active"><Link to="/">Home</Link></li>
              <li><a href="#">Details</a></li>
            </ul>
            <ul className="nav navbar-nav navbar-right">
              <li><Link to="/Login"><span className="glyphicon glyphicon-log-in" /> Log In</Link></li>
            </ul>
            <form className="navbar-form navbar-right" action="/action_page.php">
              <div className="input-group">
                <input type="text" className="form-control" placeholder="Search" name="search" />
                <div className="input-group-btn">
                  <button className="btn btn-default" type="submit">
                    <i className="glyphicon glyphicon-search" />
                  </button>
                </div>
              </div>
            </form>
            
          </div>
        </nav>
      </div>
  );
    else
      return (
       <div>
        <nav className="navbar navbar-inverse">
          <div className="container-fluid">
            <ul className="nav navbar-nav">
              <li className="active"><Link to="/">Home</Link></li>
              <li><a href="#">Details</a></li>
            </ul>
            <ul className="nav navbar-nav navbar-right">
              <li><Link to="/"><span className="glyphicon glyphicon-user" /> My Account</Link></li>
              <li><Link to="/Logout"><span className="glyphicon glyphicon-log-out" /> Log out</Link></li>
            </ul>
            <form className="navbar-form navbar-right" action="/action_page.php">
              <div className="input-group">
                <input type="text" className="form-control" placeholder="Search" name="search" />
                <div className="input-group-btn">
                  <button className="btn btn-default" type="submit">
                    <i className="glyphicon glyphicon-search" />
                  </button>
                </div>
              </div>
            </form>
            
          </div>
        </nav>
      </div>
  );
  }
}

export default Header;
