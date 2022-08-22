const { Schema, model } = require('mongoose');

const TechSchema = new Schema({
  name: {
    type: String,
    required: true,
  },
  image_path: {
    type: String,
    required: true,
  },
});

const Tech = model('Tech', TechSchema, 'technology');

module.exports = Tech;
