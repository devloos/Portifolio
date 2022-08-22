// Needed
require('dotenv').config();
const express = require('express');
const cors = require('cors');
const mongoose = require('mongoose');

// Optional
const path = require('path');

const app = express();
const PORT = process.env.PORT || 3000;

// Heroku
if (process.env.NODE_ENV === 'production') {
  app.use(express.static(__dirname + '/public/dist'));
}

// Middleware
app.use(cors());
app.use(express.json());
app.use(express.static(__dirname + '/assets'));

mongoose
  .connect(process.env.MONGO_URI, {
    useNewUrlParser: true,
    useUnifiedTopology: true,
  })
  .then(() => {
    console.log('Mongo connection successful');
  })
  .catch((err) => console.log(`Connection unsuccessful: ${err}`));

app.use('/api/tech', require('./routes/api/Tech'));
app.use('/api/projects', require('./routes/api/Projects'));

// Heroku
if (process.env.NODE_ENV === 'production') {
  app.get('/*', (req, res) => {
    res.sendFile(path.join(__dirname, './dist', 'index.html'));
  });
}

app.listen(PORT, () => console.log(`Listening on PORT: ${PORT}`));
