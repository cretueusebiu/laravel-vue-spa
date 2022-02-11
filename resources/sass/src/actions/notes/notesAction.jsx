import {
    REQUEST_NOTES_ATTEMPT,REQUEST_NOTES_SUCCESS,REQUEST_NOTES_FAILURE,
    ADD_NOTES_ATTEMPT,ADD_NOTES_SUCCESS,ADD_NOTES_FAILURE,
    EDIT_NOTES_ATTEMPT,EDIT_NOTES_SUCCESS,EDIT_NOTES_FAILURE,
    DELETE_NOTES_ATTEMPT,DELETE_NOTES_SUCCESS,DELETE_NOTES_FAILURE
} from '../actions';
import AuthRequest from '../../api/AuthRequest';

// Request Notes List
function notesListRequest() {
    return {
        type: REQUEST_NOTES_ATTEMPT
    }
}

function notesListSuccess(noteList) {
    return {
        type: REQUEST_NOTES_ATTEMPT
        payload: noteList
    }
}

function notesListFailure() {
    return {
        type: REQUEST_NOTES_Failure
    }
}

// Add Note List
function notesAddRequest() {
  return {
    type: ADD_NOTES_ATTEMPT,
  };
}

function notesAddSuccess(notesBody) {
  return {
    type: ADD_NOTES_SUCCESS,
    payload: {
       notesBody: notesBody
    }
  }
}

function notesAddFailure(error) {
  return {
    type: ADD_NOTES_FAILURE,
    payload: error
  };
}

// EDIT Note List
function notesEditRequest() {
  return {
    type: EDIT_NOTES_ATTEMPT,
  };
}

function notesEditSuccess(noteId, notesBody) {
  return {
    type: EDIT_NOTES_SUCCESS,
    payload: {
      noteId: noteId,
      notesBody: notesBody
    }
  }
}

function notesEditFailure(error) {
  return {
    type: EDIT_NOTES_FAILURE,
    payload: error
  };
}

// Delete Note List
function notesDeleteRequest() {
  return {
    type: DELETE_NOTES_ATTEMPT,
  };
}

function notesDeleteSuccess(noteId) {
  return {
    type: DELETE_NOTES_SUCCESS,
    payload: {
      note_id: noteId
    }
  }
}

function notesDeleteFailure(error) {
  return {
    type: DELETE_NOTES_FAILURE,
    payload: error
  };
}

// ======= Middleware ======
export function getNoteList() {
  return (dispatch) => {
    dispatch(notesListRequest());
    AuthRequest({
      method: 'get',
      url: '/notes/list',
    }).then((res) => {
      dispatch(notesListSuccess(res.data));
    }).catch((error) => {
      dispatch(notesListListFailure(error.message));
    });
  };
}

export function addNotes(notesBody) {
  return (dispatch) => {
    dispatch(notesAddRequest());
    AuthRequest({
      method: 'post',
      url: '/notes/add',
      params: {
        body: notesBody
      }
    }).then((res) => {
      dispatch(notesAddSuccess(noteId));
    }).catch((error) => {
      dispatch(notesAddFailure(error.message));
    });
  };
}


export function editNotes(noteId, notesBody) {
  return (dispatch) => {
    dispatch(notesDeleteRequest());
    AuthRequest({
      method: 'delete',
      url: '/favourites/remove',
      data: {
         note_id: noteId,
         body: notesBody
      }
    }).then((res) => {
      dispatch(editDeleteSuccess(id));
    }).catch((error) => {
      dispatch(editDeleteFailure(error.message));
    });
  };
}

export function removeNotes(noteId) {
  return (dispatch) => {
    dispatch(notesDeleteRequest());
    AuthRequest({
      method: 'delete',
      url: '/favourites/remove',
      data: {
        note_id: noteId,
      }
    }).then((res) => {
      dispatch(notesDeleteSuccess(id));
    }).catch((error) => {
      dispatch(notesDeleteFailure(error.message));
    });
  };
}
