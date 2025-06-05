import styled from 'styled-components';

export const PageContainer = styled.div`
  padding: 3rem;
  min-height: 100vh;
  background: linear-gradient(120deg, #05060a, #0a0d13);
  color: #d1d5db;
  font-family: 'Orbitron', 'Inter', sans-serif;
  background-image: url('https://www.transparenttextures.com/patterns/circles.png');
  background-blend-mode: overlay;
  animation: float 90s linear infinite;

  @keyframes float {
    from {
      background-position: 0 0;
    }
    to {
      background-position: 1000px 800px;
    }
  }
`;

export const Header = styled.header`
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 2.5rem;

  h1 {
    font-size: 2.5rem;
    background: linear-gradient(90deg, #3cf2ff, #8b5cf6);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 0 0 10px #3cf2ff;
    letter-spacing: 1.5px;
  }

  a {
    padding: 0.75rem 1.5rem;
    font-weight: bold;
    color: #fff;
    background: linear-gradient(135deg, #8b5cf6, #3cf2ff);
    border-radius: 14px;
    text-decoration: none;
    transition: all 0.3s ease;

    &:hover {
      background: #3cf2ff;
      color: #05060a;
      box-shadow: 0 0 30px #3cf2ff;
    }
  }
`;

export const Form = styled.form`
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
  max-width: 600px;

  label {
    font-weight: bold;
    color: #8b5cf6;
  }

  input {
    padding: 0.75rem;
    border: 1px solid #3cf2ff;
    border-radius: 10px;
    background-color: rgba(255, 255, 255, 0.03);
    color: #fff;
    outline: none;
    transition: 0.3s;

    &:focus {
      border-color: #8b5cf6;
      box-shadow: 0 0 12px #8b5cf6;
    }
  }

  button {
    margin-top: 2rem;
    padding: 0.75rem 1.5rem;
    font-weight: bold;
    background: linear-gradient(135deg, #8b5cf6, #3cf2ff);
    border: none;
    color: #fff;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease;

    &:hover {
      background: #3cf2ff;
      color: #05060a;
      box-shadow: 0 0 20px #3cf2ff;
    }
  }
`;
