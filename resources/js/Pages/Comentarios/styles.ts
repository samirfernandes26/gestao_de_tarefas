import styled from 'styled-components';

export const PageContainer = styled.div`
    padding: 3rem;
    min-height: 100vh;
    background: linear-gradient(120deg, #05060a, #1e293b);
    color: #e2e8f0;
    font-family: 'Orbitron', 'Inter', sans-serif;
`;

export const Header = styled.header`
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2.5rem;

    h1 {
        font-size: 2.3rem;
        color: #7dd3fc;
    }

    a {
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, #3b82f6, #06b6d4);
        color: white;
        text-decoration: none;
        border-radius: 12px;
        font-weight: bold;

        &:hover {
            background: #06b6d4;
        }
    }
`;

export const Table = styled.table`
    width: 100%;
    background: rgba(30, 41, 59, 0.9);
    border-collapse: collapse;
    border-radius: 14px;
    overflow: hidden;
`;

export const Thead = styled.thead`
    background: rgba(255, 255, 255, 0.06);

    th {
        padding: 1rem;
        text-align: left;
        font-size: 0.85rem;
        color: #60a5fa;
    }
`;

export const Tbody = styled.tbody`
    td {
        padding: 1rem;
        border-top: 1px solid rgba(255, 255, 255, 0.03);
    }

    tr:hover {
        background-color: rgba(255, 255, 255, 0.03);
    }

    button {
        background: transparent;
        border: none;
        color: #ef4444;
        font-weight: bold;

        &:hover {
            color: #f87171;
        }
    }
`;
