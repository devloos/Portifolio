const { Router } = require('express');
const Project = require('../../models/Project');

const router = Router();

router.get('/:category', async (req, res) => {
  const category = req.params.category;
  try {
    const Query = await Project.find({ category });
    res.status(200).json(Query);
  } catch (err) {
    res.status(404).json({ err });
  }
});

router.get('/name/:name', async (req, res) => {
  const name = req.params.name;
  try {
    const Query = await Project.find({ name });
    res.status(200).json(Query);
  } catch (err) {
    res.status(404).json({ err });
  }
});

module.exports = router;
