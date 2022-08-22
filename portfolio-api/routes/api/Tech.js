const { Router } = require('express');
const Tech = require('../../models/Tech');

const router = Router();

router.get('/', async (req, res) => {
  try {
    const Query = await Tech.find({});
    res.status(200).json(Query);
  } catch (err) {
    res.status(404).json({ err });
  }
});

module.exports = router;
