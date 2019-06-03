import React, {Component} from 'react';
class Products extends Component {
  render() {
  	return (
        <div className="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        	<div className="thumbnail">
        		<img src= {this.props.link} alt={this.props.image}/>
        		<div className="caption">
        			<h3>
                {this.props.name}
              </h3>
        			<p>
        				{this.props.price}
        			</p>
        		</div>
            <button type="button" className="btn btn-success">Buy Now</button>     
        	</div> 
        </div> 
        
    );
  }
}

export default Products;
