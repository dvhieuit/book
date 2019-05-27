import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';

class App extends Component {
    state = {
        isLoading: true,
        posts: []
    };

    async componentDidMount() {
        const response = await fetch('/api/post/list');
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