import React, { Component } from "react";
import "./Notes.scss";
import { bindActionCreators } from 'redux';
import { connect } from 'react-redux';
import { addNotes, editNotes, removeNotes, getNoteList} from '../../../actions/addFavourite/addFavourite';

class Notes extends Component {
  constructor(props) {
    super(props);
    this.state = {
      noteValue: "",
      noteSubmit: "",
      showNotes: false,
    };
    this.handleChange = this.handleChange.bind(this);
    this.handleAdd = this.handleAdd.bind(this);
    this.handleEdit = this.handleEdit.bind(this);
    this.handleDelete = this.handleDelete.bind(this);
  }

  handleChange(event) {
    this.setState({
      noteValue: event.target.value
    });
    console.log(event.target.value);
  }

  handleAdd(event) {
    this.setState({
      noteSubmit: this.state.noteValue,
      showNotes: true
    });
    addNotes(noteID, event.target.value);
    console.log(event.target.value);
  }

    handleEdit(event) {
         const wordLength = e.target.value.trim().split(/\s+/).length;
         const { noteSubmit } = this.state;
         this.setState({
               localNotes: wordLength <= 1000 ? event.target.value : localNotes,
         });
         editNotes(noteID, event.target.value);
    }

    handleDelete() {
        deleteNotes(noteID);
    }

  render() {
    const { showNotes, noteValue, noteSubmit } = this.state;

    let table = "";
    table = showNotes === false ? (
        ""
      ) : (
        <>
        <div>
          <table>
            <tr>
              <th>Notes</th>
              <th>Actions</th>
            </tr>
            <tr>
              <td>{noteSubmit}</td>
              <td>
                <button onClick="this.handleEdit">Edit</button>
                <button onClick="this.handleDelete">Delete</button>
              </td>
            </tr>
          </table>
          </div>
        </>
      );
    return (
      <div>
        <div>{table}</div>
        <form className="notes_title">
          <label>Notes: </label>
          <input
            type="text"
            value={this.state.noteValue}
            onChange={this.handleChange}
          />
          <button type="button" onClick={this.handleAdd}>Add</button>
        </form>
      </div>
    );
  }
}

function mapStateToProps(state) {
  return {
  notesList: state.notesList
  };
}

function mapDispatchToProps(dispatch) {
  return bindActionCreators({
    addNotes: addNotes,
    editNotes: editNotes,
    deleteNotes: deleteNotes,
    getNoteList: getNoteList
  }, dispatch);
}

export default connect(mapStateToProps, mapDispatchToProps)(Notes);
