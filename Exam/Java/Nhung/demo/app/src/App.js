import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';

const urlLogin = 'http://localhost:8080/api/post/list';

class App extends Component {
    state = {
        isLoading: true,
        posts: []
    };

    async componentDidMount() {
        const response = await fetch(urlLogin);
        const body = response.json();
        this.setState({ posts: body, isLoading: false });
    }

    render() {
        const {posts, isLoading} = this.state;

        if (isLoading) {
            return <p>Loading...</p>;
        }

        return (
            <div className="App">
                <header className="App-header">
                    <img src={logo} className="App-logo" alt="logo" />
                    <div className="App-intro">
                        <h2>Post List</h2>
                        <div>
                            {posts.map(post =>
                                <div key={post.id}>
                                    {post.content}
                                </div>)}
                        </div>
                    </div>
                </header>
            </div>
        );
    }
}

export default App;