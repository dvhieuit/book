import React, { Component } from 'react';
import App from './App';
import { BrowserRouter, Route, NavLink, Link } from "react-router-dom";
import { makeStyles } from "@material-ui/core/styles";
import AppBar from "@material-ui/core/AppBar";
import Toolbar from "@material-ui/core/Toolbar";
import Button from "@material-ui/core/Button";

//import { spacing } from '@material-ui/system';
const url = 'http://localhost:8080/api/customer/sign-up';
const useStyles = makeStyles(theme => ({
  button: {
    margin: theme.spacing(2),
  },
}));

function ButtonAppBar() {
  const classes = useStyles();
  return (
    <div className={classes.root}>
      <AppBar position="static">
        <Toolbar>
          <Button variant="primary"><Link to="/">Home</Link></Button>
          <Button variant="primary"><Link to="/sign-in">Login</Link></Button>
        </Toolbar>
      </AppBar>
      <p> djeifjenurjfroegrugrofnewodmwfneugjv </p>
    </div>
  );
}

export default ButtonAppBar;