<!DOCTYPE html>
<html>
<head>
  <title>NewQuestionPage</title>
  <link rel="stylesheet" href="../css/NewQuestionPage.css">
</head>
<body>
  <a href='./MainPage.php'><button class="backButton">back</button></a>

  <div class="NQPageContainer_1">
    <form action="./NewQuestionPageFunction.php" method="POST">
      <h3>Ask your question</h3>
      <p>Title</p>
        <input type="text" size="35" name="qTitle" required/>
      <p>Space</p>
        <input type="radio" name="qSpace" value="Algorithm" required>Algorithm
        <input type="radio" name="qSpace" value="Machine Learning">Machine Learning
        <input type="radio" name="qSpace" value="System">System
        <input type="radio" name="qSpace" value="Javascript">Javascript
      <p>Content</p>
        <textarea name="qContent" style="width:35em; height:8em;" required></textarea>
      <br/>
      <input type="submit" name="button" id="button" value="Submit" />
    </form>
  </div>
</body>
</html>