import React, {Component} from 'react';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
class Logout extends Component {  
  render() {
    localStorage.clear();
    window.location.replace("/");
    return(
      <div>
      </div>
      );
  }
}

export default Logout;
