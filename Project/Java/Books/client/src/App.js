import React, {Component} from 'react';
import './App.css';
import Header from './components/Header';
import Products from './components/Products';
import Login from './components/Login';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
class App extends Component {
  render() {
  	return (
    <div className="wrapper">

      <div className="container">
          <div className="row">
              <div className="row">
              	<div className="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              	   <Products
                      name="Shin - Cậu bé bút chì"
                      price= "13.00"
                      image="Shin"
                      link="https://salt.tikicdn.com/cache/550x550/media/catalog/product/s/h/shin-19_2.jpg"
                    />
                   <Products
                      name="Đắc nhân tâm"
                      price="13.01"
                      image="Shin"
                      link="https://salt.tikicdn.com/cache/550x550/ts/product/2e/eb/ad/9558a365adde6688d4c71a200d78310c.jpg"
                    />
                    <Products
                      name="Đắc nhân tâm"
                      price="13.01"
                      image="Shin"
                      link="https://salt.tikicdn.com/cache/550x550/ts/product/2e/eb/ad/9558a365adde6688d4c71a200d78310c.jpg"
                    />
                    <Products
                      name="Đắc nhân tâm"
                      price="13.01"
                      image="Shin"
                      link="https://salt.tikicdn.com/cache/550x550/ts/product/2e/eb/ad/9558a365adde6688d4c71a200d78310c.jpg"
                    />
              	</div>
            </div>
          </div>
      </div>
    </div>

  );
  }
}

export default App;
