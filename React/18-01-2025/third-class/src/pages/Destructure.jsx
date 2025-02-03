const Destructure = () => {
  const user = {
    firstName: 'rafi',
    lastName: {
      name: 'ahmed'
    },
  };

  const { firstName, lastName: { name } } = user;  // Destructuring

  return (
    <>
      <h1>Hello {firstName} {name}</h1>  {/* Shows the name using destructured values */}
      <h3>Your full name is {firstName} {name}</h3>  {/* Another display with destructuring */}
      <h2>Hi {firstName}</h2>
    </>
  );
};

export default Destructure;
