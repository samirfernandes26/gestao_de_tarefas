// resources/js/Pages/TarefaStatusLogs/styles.tsx
import styled from 'styled-components';

export const PageContainer = styled.div`
    padding: 2rem 3rem;
    min-height: 100vh;
    background: linear-gradient(120deg, #05060a, #0a0d13);
    color: #d1d5db;
    font-family: 'Orbitron', 'Inter', sans-serif;
    background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
    background-blend-mode: overlay;
`;

export const Header = styled.header`
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;

    h1 {
        font-size: 2.2rem;
        background: linear-gradient(90deg, #3cf2ff, #8b5cf6);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 0 0 8px #3cf2ff;
        letter-spacing: 1.2px;
    }
`;

export const Table = styled.table`
    width: 100%;
    background: rgba(20, 22, 29, 0.9);
    backdrop-filter: blur(12px);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.05);
    overflow: hidden;
    border-collapse: collapse;
    box-shadow: 0 0 35px rgba(0, 0, 0, 0.4);
`;

export const Thead = styled.thead`
    background: rgba(255, 255, 255, 0.06);

    th {
        padding: 1rem;
        text-align: left;
        color: #60a5fa;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.05rem;
    }
`;

export const Tbody = styled.tbody`
    td {
        padding: 1rem;
        border-top: 1px solid rgba(255, 255, 255, 0.03);
        color: #d1d5db;
    }

    tr:hover {
        background: rgba(255, 255, 255, 0.025);
    }

    button {
        background: none;
        border: none;
        color: #f87171;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s ease;

        &:hover {
            color: #fb7185;
            text-shadow: 0 0 10px #fb7185;
        }
    }
`;
