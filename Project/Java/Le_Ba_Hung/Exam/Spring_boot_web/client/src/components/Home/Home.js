import React, { Component } from 'react';

const url = 'http://localhost:8080/api/customer/signup';

class Home extends Component {
	constructor(props) {
        super(props);
        
        this.state ={
            id: '',
            email : 'abcxyz11@gmail.com',
            password : 'Abc1234@',
			fullName : 'ABC11',
            phoneNumber : '1313031165',
            role:'ROLE_CUSTOMER',
            imageURL: 'https://i.imgur.com/2G9UXB2.png'
        }
    }
	
  componentDidMount()
  {
    const data1 = {
            email : this.state.email,
            password : this.state.password,
            fullName : this.state.fullName,
            phoneNumber : this.state.phoneNumber
        }

    fetch(url, {
            method : 'POST',
            headers : {
                "Content-Type": "application/json"
            },
            body : JSON.stringify(data1)
        })
        .then(res => res.json())
        .then(data =>{
            if(data.status === 'SUCCESS'){
                console.log("SUCCESS");
                this.setState({
                    id: data.data.id,
                    fullName : data.data.fullName,
                    phoneNumber : data.data.phoneNumber,
                    role: "ROLE_CUSTOMER",
                    imageURL: data.data.imageURL
                });
            }
            else if (data.status === 'FAILED') {
                console.log("FAILED");
            }
        })

  }
	
  render() {
      return (
          <div className="App">
              <header className="App-header">
                  <div className="App-intro">
                      <h2>JUG List</h2>
                          <div key={this.state.id}>
                              {this.state.fullName}
                          </div>
                  </div>
              </header>
          </div>
      );
  }
}
export default Home