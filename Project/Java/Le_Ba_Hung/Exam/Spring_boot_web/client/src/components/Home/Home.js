import React, { Component } from 'react';
import Header from "../Header/Header";

const url = 'http://localhost:8080/api/customer/signup';

class Home extends Component {
  render() {
      return (
          <div className="App">
              <header className="App-header">
                  <div className="App-intro">
                      <Header/>
                  </div>
              </header>
          </div>
      );
  }
}
export default Home