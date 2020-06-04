<template>
<div>
    <div class="note-container">
        <Dialog :dialog="confirmDelete" message="Confirm to close ?"></Dialog>>
        <Note 
            v-for="note in notes" :key="note.id"
            :colorname="note.color"
            :author="note.user"
            :title="note.title"
            :content="note.content" 
            :noteid="note.id"

            :pos="note.pos"
            :notesCount="notes.length"
            :currentTopMost.sync="currentTopMostNote"
            :isReadonly="false"
            @newNote="createNote"
            @deleteNote="deleteNote($event)"
            @updateNote="updateNote($event)"
            @updatePos="updateNotePosition($event)"
            
        ></Note>
        <button @click="notes.push({name: 'New', user: 'Iavosoa', content: 'None', title: 'Titre', color: 'eton blue'})">Increment note</button>
    </div>
</div>
</template>

<script>
import Note from './Note.vue';
import db from '../plugins/Firebase.js'
import Dialog from './reusables/Dialog.vue';

export default {
    data() {
        return {
            notes: [],
            currentTopMostNote: 0,
            confirmDelete: false
        }
    },
    components: {
        Note,
        Dialog   
    },
    created() {
        // Get notes from databases
        this.fetchNotes();
    },
    methods: {
        fetchNotes() {
            this.notes.length = 0;
            db.collection('notes').get().then((snapshot) => {
                snapshot.docs.forEach(doc => {                    
                    let noteWidthId = {id: doc.id, ...doc.data()}
                    this.notes.push(noteWidthId);
                })
            })
        },
        createNote() {
            console.log('Create note')
            const note = {name: 'New note', 
                user: 'guest', 
                content: '', 
                color: 'yellow crayolla',
                pos: [0, 0]
            };
            db.collection('notes').add(note).then(() => {
                this.fetchNotes()
            });          
        },
        deleteNote(id) {
            this.confirmDelete = true;
            db.collection('notes').doc(id).delete().then(() => {
                console.log(`Note: ${id} has been deleted from database`);
                this.fetchNotes();
            });            
        },
        updateNote(note) {
            db.collection('notes').doc(note.id).update(note).then(() => {
                console.log(`Note: ${note.id} has been udated`);
                // this.notes.map((n) => {
                //     if (n.id === note.id) {
                //         n.saved = true;
                //     }
                // })           
                // Refresh note list after each save
                this.fetchNotes();
            })
        },
        updateNotePosition(note) {
            db.collection('notes').doc(note.id).update(note).then(() => {
                console.log(`Note: ${note.id} has changed its position`);                
            })
        }
    }
}
</script>

<style scoped>
    .note-container {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        background: white
    }
</style>