import React, { Component } from 'react';
import TextField from '@material-ui/core/TextField';
import Button from '@material-ui/core/Button';
import InputLabel from '@material-ui/core/InputLabel';
import MenuItem from '@material-ui/core/MenuItem';
import FormHelperText from '@material-ui/core/FormHelperText';
import FormControl from '@material-ui/core/FormControl';
import Select from '@material-ui/core/Select';
import Graph from './Graph'




export default class Navbar extends Component {
    constructor(props){
        super(props)
        this.state = {
            graph_data: false,
            total_assets: 0,
            total_debt: 0,
            ebitda: 0,
            interest_expense: 0,
            wc: 0,
        }
    }
    handleChange = (el) => {
        console.log(el)
        this.setState({[el.target.name]: el.target.value})
    }
    submit = () => {
        $.post({
            url: '/calculate',
            data: {                
                total_assets: this.state.total_assets,
                total_debt: this.state.total_debt,
                ebitda: this.state.ebitda,
                interest_expense: this.state.interest_expense,
                wc: this.state.wc,                
            },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: (response) => {
                console.log(response)
                this.setState({graph_data: response.graph_data})
            },
            error: (response) => {
                console.log(response, $('meta[name="csrf-token"]').attr('content'))
            }
        })
    }
    render(){
        return(
            <div>
                <div className="header">
                    <h3>Shodow Ratings</h3>
                    <div className="buttons">
                        <Button onClick={this.submit}>Calculate</Button>
                    </div>
                </div>
                <div className="inputs">
                    <input onChange={this.handleChange} type="number" value={this.state.total_assets} name="total_assets" />
                    <input onChange={this.handleChange} type="number" value={this.state.total_debt} name="total_debt" />
                    <input onChange={this.handleChange} type="number" value={this.state.ebitda} name="ebitda" />
                    <input onChange={this.handleChange} type="number" value={this.state.interest_expense} name="interest_expense" />
                    <input onChange={this.handleChange} type="number" value={this.state.wc} name="wc" />                    
                </div>

                {this.state.graph_data ? (
                    <Graph data={this.state.graph_data} key={this.state.graph_data}  />
                ):(null)}                
            </div>
        )
    }
}

