import React, { Component } from 'react';
import { Button, ButtonGroup, Container, Table } from 'reactstrap';
import AppNavbar from './AppNavbar';
import { Link } from 'react-router-dom';

class PostList extends Component {

    constructor(props) {
        super(props);
        this.state = {posts: [], isLoading: true};
        this.remove = this.remove.bind(this);
    }

    componentDidMount() {
        this.setState({isLoading: true});

        fetch('http://localhost:8080/api/post/list')
            .then(response => response.json())
            .then(data => this.setState({posts: data, isLoading: false}))
            .catch(() => this.props.history.delete('/posts'));
    }

    async remove(id) {
        await fetch(`http://localhost:8080/api/post/${id}`, {
            method: 'DELETE',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        }).then(() => {
            let updatePosts = [...this.state.posts].filter(i => i.id !== id);
            this.setState({posts: updatePosts}); //
        });
        console.log("n");
    }
    render() {
        const {posts, isLoading} = this.state;

        if (isLoading) {
            return <p>Loading...</p>;
        }

        const postList = posts.map(post => {
            return <tr key={post.id}>
                <td style={{whiteSpace: 'nowrap'}}>{post.content}</td>

                <td>
                    <ButtonGroup>
                        <Button size="sm" color="primary" tag={Link} to={"/posts/" + post.id}>Edit</Button>
                        <Button size="sm" color="danger" onClick={() => this.remove(post.id)}>Delete</Button>
                    </ButtonGroup>
                </td>
            </tr>
        });

        return (
            <div>
                <AppNavbar/>
                <Container fluid>
                    <div className="float-right">
                        <Button color="success" tag={Link} to="/posts/new">Add Post</Button>
                    </div>
                    <h3>Customer List</h3>
                    <Table className="mt-4">
                        <thead>
                        <tr>
                            <th width="20%">Name</th>
                            <th width="10%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        {postList}
                        </tbody>
                    </Table>
                </Container>
            </div>
        );
    }
}

export default PostList;