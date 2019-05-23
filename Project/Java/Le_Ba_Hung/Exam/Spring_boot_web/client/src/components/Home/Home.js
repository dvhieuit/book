import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import { Button, Container } from 'reactstrap';

const urlLogin = 'http://localhost:8080/login';

class Home extends Component {
	constructor(props) {
        super(props);
        
        this.state ={
            
        }
    }
	
  componentDidMount() {
        fetch(urlLogin, {			
            method : 'GET',
			headers : {
                'Content-Type' : 'application/json'
            }
        })
		.then(res=>res.toString())
		.then(data =>{
            if(data.status === 'SUCCESS'){
                 console.log("sss");           
            }
            else if(data.status === 'FAILED'){
                console.log("fail");
            }
        })
    }
	
  render() {
    return (
      <div>
        <Container fluid>
          <Button color="link"><Link to="/login">Manage JUG Tour</Link></Button>
        </Container>
      </div>
    );
  }
}
export default Home