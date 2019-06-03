import React, { Component } from 'react';
import { BrowserRouter, Route, NavLink, Link } from "react-router-dom";

const url = 'http://localhost:8080/api/customer/Home2';
class BackHome extends Component {
  render() {
  return (
    <ul>
      <li>
        <Link to="/">Home</Link>
      </li>
      <li>
        <Link to="/about">Logout</Link>
      </li>
    </ul>
  );
}
}

export default BackHome;