const React = require('react');

import UpdateDialog from './UpdateDialog.js';

class Booking extends React.Component {
    
    constructor(props) {
        super(props);
        this.handleDelete = this.handleDelete.bind(this);
    }

    handleDelete() {
        this.props.onDelete(this.props.booking);
    }

    render() {
        return (
            <tr>
                <td>{this.props.booking.entity.kreuzfahrt}</td>							
                <td>{this.props.booking.entity.flug}</td>
                <td>{this.props.booking.entity.hotel}</td>
                <td>{this.props.booking.entity.versicherung}</td>
                <td>{this.props.booking.entity.total}</td>
                <td>{this.props.booking.entity.dayDeparture}</td> 
                <td>{this.props.booking.entity.monthDeparture}</td>
                <td>{this.props.booking.entity.yearDeparture}</td>
                <td>{this.props.booking.entity.surname}</td>
                <td>{this.props.booking.entity.firstName}</td>
                <td>{this.props.booking.entity.bookingNumber}</td>	
                <td>{this.props.booking.entity.storno}</td>
                <td>{this.props.booking.entity.comment}</td>
                <td>{this.props.booking.entity.bookingDate}</td>
                <td>{this.props.booking.entity.manager.name}</td>
                <td>
                    <UpdateDialog booking={this.props.booking}
                                    attributes={this.props.attributes}
                                    onUpdate={this.props.onUpdate}/>
                </td>
                <td>
                    <button onClick={this.handleDelete}>Delete</button>
                </td>
            </tr>
        )
    }
}

export default Booking;