import React, { Component } from 'react';
import { Link, withRouter } from 'react-router-dom';
import { Button, Container, Form, FormGroup, Input, Label } from 'reactstrap';
import AppNavbar from './AppNavbar';

class PostEdit extends Component {

    emptyItem = {
        content: ''
    };

    constructor(props) {
        super(props);
        this.state = {
            item: this.emptyItem
        };
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    async componentDidMount() {
        if (this.props.match.params.id !== 'new') {
            const post = await (await fetch(`http://localhost:8080/api/post/${this.props.match.params.id}`)).json();
            this.setState({item: post});
        }
    }

    handleChange(event) {
        const target = event.target;
        const value = target.value;
        const content = target.content;
        let item = {...this.state.item};
        item.content = value;
        this.setState({item});
    }

    async handleSubmit(event) {
        event.preventDefault();
        const {item} = this.state;
        if (this.props.match.params.id!='new')
            item.id=this.props.match.params.id;
        //item.id=this.props.match.params.id;
        //console.log(this.props.match.params.id);
        //dung cac lenh api vi du put post truyen tham so id vao
        await fetch('http://localhost:8080/api/post', {
            method: (this.props.match.params.id!='new') ? 'PUT' : 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(item),
        });
        this.props.history.push('/posts');
        console.log("n");
    }

    render() {
        const {item} = this.state;
        const title = <h2>{item.id ? 'Edit Post' : 'Add Post'}</h2>;
        console.log();
        return <div>
            <AppNavbar/>
            <Container>
                {title}
                <Form onSubmit={this.handleSubmit}>
                    <FormGroup>
                        <Label for="content">Name</Label>
                        <Input type="text" name="content" id="content" value={item.content || ''}
                               onChange={this.handleChange} autoComplete="content"/>
                    </FormGroup>

                    <FormGroup>
                        <Button color="primary" type="submit">Save</Button>{' '}
                        <Button color="secondary" tag={Link} to="/posts">Cancel</Button>
                    </FormGroup>
                </Form>
            </Container>
        </div>
    }
}

export default withRouter(PostEdit);